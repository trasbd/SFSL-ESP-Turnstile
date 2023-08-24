USE [turnstile]
GO

/****** Object:  Table [dbo].[mac]    Script Date: 8/23/2023 8:25:24 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[mac](
	[ride] [text] NULL,
	[mac] [text] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

